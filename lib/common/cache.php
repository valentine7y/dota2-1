<?php
require_once('config.php');

//
//tbd:
//	1) add support for the expire for set/add/replace
//	2) support callback function for get
//	3) support multi-server
//	4) support cas(need obtain the cas token from the get method, compare and set)
//	5) support persist connection
//	6) support redis data structure function
//

class Cache
{
	private $_cache;
	public function __construct()
	{
		switch(CACHE_DRIVER)
		{
			case -1:
				$this->_cache = new Cache_dummy();
			break;

			case 0:
				$this->_cache = new Cache_memcache();
			break;
			
			case 1:
				$this->_cache = new Cache_memcached();
			break;
			
			case 2:
				$this->_cache = new Cache_redis();
			break;

			default:
				die('Not supported cache driver');
			break;
		}
	}

	public function set($key, $value)
	{
		return $this->_cache->set($key, $value);
	}

	public function get($key)
	{
		return $this->_cache->get($key); 
	}
	
	public function add($key, $value)
	{
		return $this->_cache->add($key, $value);
	}
	
	public function replace($key, $value)
	{
		return $this->_cache->replace($key, $value);
	}
	
	public function delete($key)
	{
		return $this->_cache->delete($key); 
	}

	public function incr($key, $offset = 1)
	{
		return $this->_cache->incr($key, $offset); 
	}

	public function decr($key, $offset = 1)
	{
		return $this->_cache->decr($key, $offset); 
	}
	
	public function append($key, $value)
	{
		return $this->_cache->append($key, $value);
	}
	
	public function prepend($key, $value)
	{
		return $this->_cache->prepend($key, $value);
	}
}

class Cache_dummy
{
	public function set($key, $value) { return false;}
	public function get($key) { return false;}
	public function add($key, $value) { return false;}
	public function replace($key, $value) { return false;}
	public function delete($key) { return false;}
	public function incr($key, $offset ) { return false;}
	public function decr($key, $offset ) { return false;}
	public function append($key, $value) { return false;}
	public function prepend($key, $value) { return false;}
}


class Cache_memcache
{
	private $_memcache;
	public function __construct()
	{
		$this->_memcache = new Memcache();
		$this->_memcache->addServer(CACHE_HOST, MEMCACHE_PORT);
	}

	public function set($key, $value)
	{
		return $this->_memcache->set($key, $value);
	}

	public function get($key)
	{
		return $this->_memcache->get($key); 
	}
	
	public function add($key, $value)
	{
		return $this->_memcache->add($key, $value);
	}
	
	public function replace($key, $value)
	{
		return $this->_memcache->replace($key, $value);
	}
	
	public function delete($key)
	{
		return $this->_memcache->delete($key); 
	}

	public function incr($key, $offset)
	{
		$this->_memcache->add($key, 0);
		return $this->_memcache->increment($key, $offset); 
	}

	public function decr($key, $offset)
	{
		return $this->_memcache->decrement($key, $offset); 
	}
	
	public function append($key, $value)
	{
		return $this->_memcache->append($key, $value);
	}
	
	public function prepend($key, $value)
	{
		return $this->_memcache->prepend($key, $value);
	}
}

class Cache_memcached
{
	private $_memcached;
	public function __construct()
	{
		$this->_memcached = new Memcached();
		$this->_memcached->addServer(CACHE_HOST, MEMCACHE_PORT);
		$this->_memcached->setOption(Memcached::OPT_COMPRESSION, false);
	}

	public function set($key, $value)
	{
		return $this->_memcached->set($key, $value);
	}

	public function get($key)
	{
		return $this->_memcached->get($key); 
	}
	
	public function add($key, $value)
	{
		return $this->_memcached->add($key, $value);
	}
	
	public function replace($key, $value)
	{
		return $this->_memcached->replace($key, $value);
	}
	
	public function delete($key)
	{
		return $this->_memcached->delete($key); 
	}

	public function incr($key, $offset)
	{
		$this->_memcached->add($key, 0);
		return $this->_memcached->increment($key, $offset); 
	}

	public function decr($key, $offset)
	{
		return $this->_memcached->decrement($key, $offset); 
	}
	
	public function append($key, $value)
	{
		return $this->_memcached->append($key, $value);
	}
	
	public function prepend($key, $value)
	{
		return $this->_memcached->prepend($key, $value);
	}
}

class Cache_redis
{
	private $_redis;
	public function __construct()
	{
		$this->_redis = new Redis();
		$this->_redis->connect(CACHE_HOST, REDIS_PORT);
	}

	public function set($key, $value)
	{
		return $this->_redis->set($key, serialize($value));
	}

	public function get($key)
	{
		return unserialize($this->_redis->get($key)); 
	}
	
	public function add($key, $value)
	{
		return $this->_redis->setnx($key, serialize($value));
	}
	
	public function replace($key, $value)
	{
		if(!$this->_redis->exists($key)) return false;
		return $this->_redis->set($key, serialize($value));
	}
	
	public function delete($key)
	{
		return $this->_redis->delete($key); 
	}

	public function incr($key, $offset)
	{
		return $this->_redis->incrBy($key, $offset); 
	}

	public function decr($key, $offset)
	{
		return $this->_redis->decrBy($key, $offset); 
	}
	
	//not supported
	public function append($key, $value)
	{
		return false; 
	}
	
	//not supported
	public function prepend($key, $value)
	{
		return false; 
	}
}

?>










