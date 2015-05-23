<?php 

namespace  App\Events\Attachments;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class FileWasUploaded extends Event {

    use SerializesModels;
    /**
     * @var
     */
    public $request;

    public $object;


     /**
     * Create a new event instance.
     *
     * @param $request
     * 
     */
    public function __construct($request, $object)
    {

        $this->request = $request;
        
        $this->object  = $object;

    }

}