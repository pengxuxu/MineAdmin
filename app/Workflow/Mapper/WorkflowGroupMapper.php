<?php
declare(strict_types=1);
/**
 * MineAdmin is committed to providing solutions for quickly building web applications
 * Please view the LICENSE file that was distributed with this source code,
 * For the full copyright and license information.
 * Thank you very much for using MineAdmin.
 *
 * @Author X.Mo<root@imoi.cn>
 * @Link   https://gitee.com/xmo/MineAdmin
 */

namespace App\Workflow\Mapper;

use App\Workflow\Model\WorkflowGroup;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 流程分组Mapper类
 */
class WorkflowGroupMapper extends AbstractMapper
{
    /**
     * @var WorkflowGroup
     */
    public $model;

    public function assignModel()
    {
        $this->model = WorkflowGroup::class;
    }

    /**
     * 搜索处理器
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function handleSearch(Builder $query, array $params): Builder
    {
        
        // 分组名称
        if (isset($params['group_name']) && $params['group_name'] !== '') {
            $query->where('group_name', '=', $params['group_name']);
        }

        // 创建时间
        if (isset($params['created_at']) && is_array($params['created_at']) && count($params['created_at']) == 2) {
            $query->whereBetween(
                'created_at',
                [ $params['created_at'][0], $params['created_at'][1] ]
            );
        }

        return $query;
    }
}