<?php namespace Gazer\Integrators;

use GrahamCampbell\Flysystem\FlysystemManager;
// use Illuminate\Support\Facades\App; // you probably have this aliased already

class AwsUploader
{
    protected $flysystem;

    public function __construct(FlysystemManager $flysystem)
    {
        $this->flysystem = $flysystem;
    }

    public function upload($pathEntities, $file)
    {

    	$filename = $this->buildPath($pathEntities) . '/' . $this->makeSalt() . '-' . $file->getClientOriginalName();

        $this->flysystem->write($filename, $file);

        return $this->flysystem->getAdapter()->getClient()->getObjectUrl('gazer', $filename);
    }

    public function buildPath($pathEntities)
    {
    	$out = 'attachments/';

    	foreach ($pathEntities as $key => $value) {
    		
    		$out .= $key . '/' . $value;	

    	}

        return $out;

    }

    public function makeSalt()
    {
    	return md5(\Hash::make(time()));
    }
}

// App::make('Foo')->bar();