<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Service\CSVManager;
use Symfony\Component\HttpKernel\KernelInterface;
class ImportUsersCSVCommand extends Command
{
    private $CSVManager;
    private $projectDir;
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:import-users';
    public function __construct(CSVManager $csv,KernelInterface $kernel)
    {
        // best practices recommend to call the parent constructor first and
        // then set your own properties. That wouldn't work in this case
        // because configure() needs the properties set in this constructor
        parent::__construct();
        $this->CSVManager = $csv;
        $this->projectDir = $kernel->getProjectDir();
    }
    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Import Users from a CSV file');

            // the full command description shown when running the command with
            // the "--help" option
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Started parsing the file");
        $output->writeln($this->projectDir );
        $file = fopen($this->projectDir . '/files/users.csv', 'r');
        $i = 0;
      
        while (($line = fgetcsv($file)) !== FALSE) {
            if (++$i == 0) continue;
            //$line is an array of the csv elements
            $line = (implode(';', $line));
          
            $line = (explode(';', $line));
            $output->writeln($line);
           
            $this->CSVManager->saveRecord($line);
        }
        fclose($file);
        // outputs a message followed by a "\n"
        $output->writeln("It\'s done");
    }
}
