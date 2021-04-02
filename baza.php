<?php

namespace AppBundle\Command;

use AppBundle\Services\CSVManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCSVCommand extends Command
{

    /**
     * @var string
     */
    private $path;
    /**
     * @var CSVManager
     */
    private $CSVManager;

    public function __construct(string $path, CSVManager $CSVManager)
    {
        parent::__construct();
        $this->path = $path;
        $this->CSVManager = $CSVManager;
    }

    protected static $defaultName = 'import:clients';

    protected function configure()
    {
        // TODO: update the directory here, where the file is stored
        $this
            ->setDescription('This command will import and the clients and their contacts from the CSV file.')
            ->setHelp("Make sure the file is the proper directory");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Started parsing the file");
        $output->writeln($this->path);
        $file = fopen($this->path . '/files/clients.csv', 'r');
        $i = 0;
        while (($line = fgetcsv($file)) !== FALSE) {
            if (++$i == 0) continue;
            //$line is an array of the csv elements
            $line = (explode(';', $line[0]));
            $this->CSVManager->saveRecord($line);
        }
        fclose($file);
        // outputs a message followed by a "\n"
        $output->writeln("It\'s done");
    }


}
