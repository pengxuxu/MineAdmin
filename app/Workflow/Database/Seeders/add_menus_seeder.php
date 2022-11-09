<?php
/**
 * MineAdmin is committed to providing solutions for quickly building web applications
 * Please view the LICENSE file that was distributed with this source code,
 * For the full copyright and license information.
 * Thank you very much for using MineAdmin.
 *
 * @Author X.Mo<root@imoi.cn>
 * @Link   https://gitee.com/xmo/MineAdmin
 */

declare(strict_types=1);

use Hyperf\Database\Seeders\Seeder;
use Hyperf\DbConnection\Db;

class AddMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getData() as $item) {
            Db::insert($item);
        }
    }

    protected function getData(): array
    {
        $model = env('DB_PREFIX') . \App\System\Model\SystemMenu::getModel()->getTable();
        return [
            "INSERT INTO `{$model}`(`id`, `parent_id`, `level`, `name`, `code`, `icon`, `route`, `component`, `redirect`, `is_hidden`, `type`, `status`, `sort`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `remark`) VALUES (5000, 0, '0', '工作流程', 'workflow', 'ma-icon-workflow', NULL, NULL, NULL, 2, 'M', 1, 1, 1, 1, '2022-11-09 14:19:26', '2022-11-09 14:19:26', NULL, NULL)",
            "INSERT INTO `{$model}`(`id`, `parent_id`, `level`, `name`, `code`, `icon`, `route`, `component`, `redirect`, `is_hidden`, `type`, `status`, `sort`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `remark`) VALUES (5100, 5000, '0,5000', '流程管理', 'processManage', 'icon-share-alt', 'processManage', '', NULL, 2, 'M', 1, 99, 1, 1, '2021-07-25 18:48:47', '2022-11-09 14:19:54', NULL, NULL)",
            "INSERT INTO `{$model}`(`id`, `parent_id`, `level`, `name`, `code`, `icon`, `route`, `component`, `redirect`, `is_hidden`, `type`, `status`, `sort`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `remark`) VALUES (5200, 5000, '0,5000', '在线办公', 'onlineOffice', 'icon-desktop', 'onlineOffice', '', NULL, 2, 'M', 1, 98, 1, 1, '2021-07-25 18:48:47', '2022-11-09 14:20:05', NULL, NULL)",
        ];
    }
}
