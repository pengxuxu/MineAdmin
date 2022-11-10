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

class AddDictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getTypeData() as $item) {
            Db::insert($item);
        }

        foreach ($this->getDictData() as $item) {
            Db::insert($item);
        }
    }

    protected function getTypeData(): array
    {
        $model = env('DB_PREFIX') . \App\System\Model\SystemDictType::getModel()->getTable();
        return [
            "INSERT INTO `{$model}`(`name`, `code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `remark`) VALUES ('流程状态', 'workflow_status', 1, 1, 1, '2022-11-10 14:55:37', '2022-11-10 14:55:37', NULL, NULL)",
            "INSERT INTO `{$model}`(`name`, `code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `remark`) VALUES ('审批状态', 'approval_status', 1, 1, 1, '2022-11-10 14:55:49', '2022-11-10 14:55:49', NULL, NULL)",
        ];
    }

    protected function getDictData(): array
    {
        $model = env('DB_PREFIX') . \App\System\Model\SystemDictData::getModel()->getTable();
        $workflowDictId = \App\System\Model\SystemDictType::where('code', '=', 'workflow_status')->value('id');
        $approvalDictId = \App\System\Model\SystemDictType::where('code', '=', 'approval_status')->value('id');
        return [
            "INSERT INTO `${model}`(`type_id`, `label`, `value`, `code`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `remark`) VALUES ({$workflowDictId}, '已发布', '1', 'workflow_status', 1, 1, 1, 1, '2022-11-10 14:56:13', '2022-11-10 14:56:13', NULL, NULL)",
            "INSERT INTO `${model}`(`type_id`, `label`, `value`, `code`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `remark`) VALUES ({$workflowDictId}, '未发布', '2', 'workflow_status', 1, 1, 1, 1, '2022-11-10 14:56:20', '2022-11-10 14:56:20', NULL, NULL)",

            "INSERT INTO `{$model}`(`type_id`, `label`, `value`, `code`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `remark`) VALUES ({$approvalDictId}, '运行中', '1', 'approval_status', 1, 1, 1, 1, '2022-11-10 14:56:52', '2022-11-10 14:56:52', NULL, NULL)",
            "INSERT INTO `{$model}`(`type_id`, `label`, `value`, `code`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `remark`) VALUES ({$approvalDictId}, '已通过', '2', 'approval_status', 1, 1, 1, 1, '2022-11-10 14:57:15', '2022-11-10 14:57:15', NULL, NULL)",
            "INSERT INTO `{$model}`(`type_id`, `label`, `value`, `code`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `remark`) VALUES ({$approvalDictId}, '已驳回', '3', 'approval_status', 1, 1, 1, 1, '2022-11-10 14:57:21', '2022-11-10 14:57:21', NULL, NULL)",
            "INSERT INTO `{$model}`(`type_id`, `label`, `value`, `code`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `remark`) VALUES ({$approvalDictId}, '已撤销', '4', 'approval_status', 1, 1, 1, 1, '2022-11-10 14:57:28', '2022-11-10 14:57:28', NULL, NULL)",

        ];
    }
}
