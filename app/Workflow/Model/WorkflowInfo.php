<?php

declare (strict_types=1);
namespace App\Workflow\Model;

use Hyperf\Database\Model\SoftDeletes;
use Mine\MineModel;
/**
 * @property int $id 主键
 * @property int $group_id 所属流程组
 * @property int $workflow_form_id 所属业务表
 * @property string $icon 流程图标
 * @property string $icon_bg_color 图标背景颜色
 * @property string $title 流程标题
 * @property string $desc 流程简介
 * @property int $status 状态 (1-已发布 2-未发布)
 * @property string $node_source 节点源信息
 * @property int $created_by 创建者
 * @property int $updated_by 更新者
 * @property \Carbon\Carbon $created_at 创建时间
 * @property \Carbon\Carbon $updated_at 更新时间
 * @property string $deleted_at 删除时间
 * @property string $remark 备注
 */
class WorkflowInfo extends MineModel
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    protected ?string $table = 'workflow_info';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = ['id', 'group_id', 'workflow_form_id', 'icon', 'icon_bg_color', 'title', 'desc', 'status', 'node_source', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at', 'remark'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = ['id' => 'integer', 'group_id' => 'integer', 'workflow_form_id' => 'integer', 'status' => 'integer', 'created_by' => 'integer', 'updated_by' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    /**
     * 定义 workflowGpoup 关联
     * @return \Hyperf\Database\Model\Relations\belongsTo
     */
    public function workflowGpoup() : \Hyperf\Database\Model\Relations\belongsTo
    {
        return $this->belongsTo(\App\Workflow\Model\WorkflowGroup::class, 'id', 'group_id');
    }

    /**
     * 定义 workflowForm 关联
     * @return \Hyperf\Database\Model\Relations\hasOne
     */
    public function workflowForm() : \Hyperf\Database\Model\Relations\hasOne
    {
        return $this->hasOne(\App\Workflow\Model\WorkflowGroup::class, 'id', 'workflow_form_id');
    }
}