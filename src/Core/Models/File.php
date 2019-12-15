<?php

namespace GuestBook\Core\Models;

use GuestBook\Core;
use GuestBook\Core\{FileReader, FileWriter};
use GuestBook\Extensions\Collection;


class File implements FileReader, FileWriter
{
    private const LOG_DIRECTORY = 'logs/';
    public $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function read(string $fileName)
    {
        $data = file(self::LOG_DIRECTORY . "{$fileName}");

        return $this->extractData($data);
    }

    public function write(string $fileName, $data)
    {
        if (!is_dir(self::LOG_DIRECTORY))
            mkdir(self::LOG_DIRECTORY, 0777, true);

        file_put_contents(self::LOG_DIRECTORY . "{$fileName}", $data . PHP_EOL, FILE_APPEND);
    }

    private function extractData($data)
    {
        $properties = [];

        foreach ($data as $row)
            $properties[] = explode('-', $row);

        return (new Collection($properties))
            ->map(function($message) {
                return [
                    'name' => $message[0],
                    'contents' => $message[1],
                    'created_at' => $message[2]
                ];
            });
    }
}
