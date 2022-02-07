<?php

namespace TheBachtiarz\SerialNumber\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use TheBachtiarz\SerialNumber\Interfaces\ConfigInterface;
use TheBachtiarz\Toolkit\Config\Helper\ConfigHelper;
use TheBachtiarz\Toolkit\Config\Interfaces\Data\ToolkitConfigInterface;
use TheBachtiarz\Toolkit\Config\Service\ToolkitConfigService;

class MiddlewareStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'thebachtiarz:finance:middleware:status {status : Set status to 1:Enable or 0:Disable}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Finance: Set middleware status activation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $status = (bool) $this->argument('status');

        try {
            throw_if(!$this->confirm("Are you sure to " . ($status ? "enable" : "disable") . " middleware status?"), 'Exception', "Update serial number middleware status canceled");

            $updateConfigFile = ConfigHelper::setConfigName(ConfigInterface::SERIAL_NUMBER_CONFIG_NAME)
                ->updateConfigFile(ConfigInterface::SERIAL_NUMBER_CONFIG_MIDDLEWARE_STATUS_CODE_NAME, $status);

            throw_if(!$updateConfigFile, 'Exception', "Failed to update config middleware status");

            $updateConfigData = ToolkitConfigService::name(ConfigInterface::SERIAL_NUMBER_CONFIG_PREFIX_NAME . "/" . ConfigInterface::SERIAL_NUMBER_CONFIG_MIDDLEWARE_STATUS_CODE_NAME)
                ->value($status)
                ->accessGroup(ToolkitConfigInterface::TOOLKIT_CONFIG_PRIVATE_CODE)
                ->set();

            throw_if(!$updateConfigData, 'Exception', "Failed to update config middleware status");

            Artisan::call('config:cache');

            Log::channel('application')->info("- Successfully update serial number middleware status");

            $this->info('Successfully update serial number middleware status.');

            return 1;
        } catch (\Throwable $th) {
            Log::channel('application')->warning("- Failed to update serial number middleware status: {$th->getMessage()}");

            $this->warn($th->getMessage() ?: "Failed to update Serial number middleware status.");

            return 0;
        }
    }
}
