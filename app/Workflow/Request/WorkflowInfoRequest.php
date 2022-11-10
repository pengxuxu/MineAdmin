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
namespace App\Workflow\Request;

use Mine\MineFormRequest;

/**
 * 流程管理验证数据类
 */
class WorkflowInfoRequest extends MineFormRequest
{
    /**
     * 公共规则
     */
    public function commonRules(): array
    {
        return [];
    }

    
    /**
     * 新增数据验证规则
     * return array
     */
    public function saveRules(): array
    {
        return [
            //所属流程组 验证
            'group_id' => 'required',
            //所属业务表 验证
            'workflow_form_id' => 'required',
            //流程图标 验证
            'icon' => 'required',
            //图标背景颜色 验证
            'icon_bg_color' => 'required',
            //流程标题 验证
            'title' => 'required',

        ];
    }
    /**
     * 更新数据验证规则
     * return array
     */
    public function updateRules(): array
    {
        return [
            //所属流程组 验证
            'group_id' => 'required',
            //所属业务表 验证
            'workflow_form_id' => 'required',
            //流程图标 验证
            'icon' => 'required',
            //图标背景颜色 验证
            'icon_bg_color' => 'required',
            //流程标题 验证
            'title' => 'required',

        ];
    }

    
    /**
     * 字段映射名称
     * return array
     */
    public function attributes(): array
    {
        return [
            'group_id' => '所属流程组',
            'workflow_form_id' => '所属业务表',
            'icon' => '流程图标',
            'icon_bg_color' => '图标背景颜色',
            'title' => '流程标题',

        ];
    }

}