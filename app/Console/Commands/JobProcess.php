<?php

namespace App\Console\Commands;

use App\Service\Job\JobProcessService;
use Illuminate\Console\Command;

class JobProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'JobProcess:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    private $jobProcessService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct( JobProcessService $jobProcessService)
    {
        $this->jobProcessService = $jobProcessService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Amqp::consume('job-update', function ($message, $resolver) {
            $this->jobProcessService->updateStatusJob($message->body);
            $resolver->acknowledge($message);
        }, [
            'timeout' => 2,
            'vhost' => 'samacom',
            'exchange' => 'message_samacom',
            'persistent' => true
        ]);
    }
}
