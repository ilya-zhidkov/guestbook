<?php

namespace GuestBook\Core\Actions;

use GuestBook\Core\Models\{File, User};
use GuestBook\Extensions\Collection;

class ReadAction implements Action
{
    private $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function execute(User $user)
    {
        $data = $this->file->read($this->file->path);

        $messages = (new Collection($data))
            ->sortBy('created_at', 'desc');

        foreach ($messages as $message) {
            echo "\nAuthor: {$message['name']}\n";
            echo "Contents: {$message['contents']}\n"; 
            echo "Created at: " . date('d. m. Y H:i:s', (int)$message['created_at']) . PHP_EOL;
            echo "-----------------------------------\n";
        }
    }
}
