<?php namespace App\Handlers\Events\Attachments;

use App\Events\Attachments\FileWasUploaded;
use Gazer\Integrators\AwsUploader;


class WhenFileWasUploaded {

	protected $uploader;

    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(AwsUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * Handle the event.
     *
     * @param  FileWasUploaded  $event
     * @return void
     */
    public function handle(FileWasUploaded $event)
    {

    	$pathEntities = [class_basename($event->object) => $event->object->slug];

    	// $this->uploader->upload($pathEntities, $event->object->slug);

    	foreach ($event->request->file('attachments') as $att) {
    		
    		dd($this->uploader->upload($pathEntities, $att['file']));

    	}

    	dd($event->request->file('attachments'));

    }

}