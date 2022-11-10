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

use App\Workflow\Model\WorkflowInfo;
use Hyperf\Database\Model\Builder;
use Mine\Abstracts\AbstractMapper;

/**
 * 流程管理Mapper类
 */
class WorkflowInfoMapper extends AbstractMapper
{
    /**
     * @var WorkflowInfo
     */
    public $model;

    public function assignModel()
    {
        $this->model = WorkflowInfo::class;
    }

    /**
     * 搜索处理器
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function handleSearch(Builder $query, array $params): Builder
    {
        
        // 所属流程组
        if (isset($params['group_id']) && $params['group_id'] !== '') {
            $query->where('group_id', '=', $params['group_id']);
        }

        // 所属业务表
        if (isset($params['workflow_form_id']) && $params['workflow_form_id'] !== '') {
            $query->where('workflow_form_id', '=', $params['workflow_form_id']);
        }

        // 流程图标
        if (isset($params['icon']) && $params['icon'] !== '') {
            $query->where('icon', '=', $params['icon']);
        }

        // 图标背景颜色
        if (isset($params['icon_bg_color']) && $params['icon_bg_color'] !== '') {
            $query->where('icon_bg_color', '=', $params['icon_bg_color']);
        }

        // 流程标题
        if (isset($params['title']) && $params['title'] !== '') {
            $query->where('title', '=', $params['title']);
        }

        // 流程简介
        if (isset($params['desc']) && $params['desc'] !== '') {
            $query->where('desc', '=', $params['desc']);
        }

        // 状态 (1-已发布 2-未发布)
        if (isset($params['status']) && $params['status'] !== '') {
            $query->where('status', '=', $params['status']);
        }

        return $query;
    }
}