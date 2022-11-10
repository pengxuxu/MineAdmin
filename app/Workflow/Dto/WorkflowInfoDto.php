<?php
namespace App\Workflow\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 流程管理Dto （导入导出）
 */
#[ExcelData]
class WorkflowInfoDto implements MineModelExcel
{
    #[ExcelProperty(value: "主键", index: 0)]
    public string $id;

    #[ExcelProperty(value: "所属流程组", index: 1)]
    public string $group_id;

    #[ExcelProperty(value: "所属业务表", index: 2)]
    public string $workflow_form_id;

    #[ExcelProperty(value: "流程图标", index: 3)]
    public string $icon;

    #[ExcelProperty(value: "图标背景颜色", index: 4)]
    public string $icon_bg_color;

    #[ExcelProperty(value: "流程标题", index: 5)]
    public string $title;

    #[ExcelProperty(value: "流程简介", index: 6)]
    public string $desc;

    #[ExcelProperty(value: "状态 (1-已发布 2-未发布)", index: 7)]
    public string $status;

    #[ExcelProperty(value: "节点源信息", index: 8)]
    public string $node_source;

    #[ExcelProperty(value: "创建者", index: 9)]
    public string $created_by;

    #[ExcelProperty(value: "更新者", index: 10)]
    public string $updated_by;

    #[ExcelProperty(value: "创建时间", index: 11)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 12)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 13)]
    public string $deleted_at;

    #[ExcelProperty(value: "备注", index: 14)]
    public string $remark;


}