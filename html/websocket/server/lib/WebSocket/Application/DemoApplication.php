<?php

namespace WebSocket\Application;

/**
 * Websocket-Server demo and test application.
 * 
 * @author Simon Samtleben <web@lemmingzshadow.net>
 */
class DemoApplication extends Application
{
    private $_clients = array();
	private $_filename = '';

	public function onConnect($client)
    {
        print "onConnect\n";
		$id = $client->getClientId();
        $this->_clients[$id] = $client;
    }

    public function onDisconnect($client)
    {
        print "onDisconnect\n";
        $id = $client->getClientId();
		unset($this->_clients[$id]);
    }

    public function onData($data, $client)
    {
        print "onTextData\n";
        var_dump($data);
        foreach ($this->_clients as $c) {
            $c->send($data);
        }
//        var_dump($data);
/*        $decodedData = $this->_decodeData($data);
		if($decodedData === false)
		{
			// @todo: invalid request trigger error...
		}

		$actionName = '_action' . ucfirst($decodedData['action']);
		if(method_exists($this, $actionName))
		{
			call_user_func(array($this, $actionName), $decodedData['data']);
		}*/
    }

	public function onBinaryData($data, $client)
	{
        print "onBinaryData\n";
		$filePath = substr(__FILE__, 0, strpos(__FILE__, 'server')) . 'tmp/';
		$putfileResult = false;
		if(!empty($this->_filename))
		{
			$putfileResult = file_put_contents($filePath.$this->_filename, $data);			
		}		
		if($putfileResult !== false)
		{
			
			$msg = 'File received. Saved: ' . $this->_filename;
		}
		else
		{
			$msg = 'Error receiving file.';
		}
		$client->send($this->_encodeData('echo', $msg));
		$this->_filename = '';
	}
	
	private function _actionEcho($text)
	{		
		$encodedData = $this->_encodeData('echo', $text);		
		foreach($this->_clients as $sendto)
		{
			$sendto->send($encodedData);
        }
	}
	
	private function _actionSetFilename($filename)
	{		
		if(strpos($filename, '\\') !== false)
		{
			$filename = substr($filename, strrpos($filename, '\\')+1);
		}
		elseif(strpos($filename, '/') !== false)
		{
			$filename = substr($filename, strrpos($filename, '/')+1);
		}		
		if(!empty($filename)) 
		{
			$this->_filename = $filename;
			return true;
		}
		return false;
	}
}
