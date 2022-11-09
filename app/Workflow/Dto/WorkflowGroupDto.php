<?php
namespace App\Workflow\Dto;

use Mine\Interfaces\MineModelExcel;
use Mine\Annotation\ExcelData;
use Mine\Annotation\ExcelProperty;

/**
 * 流程分组Dto （导入导出）
 */
#[ExcelData]
class WorkflowGroupDto implements MineModelExcel
{
    #[ExcelProperty(value: "分组主键", index: 0)]
    public string $id;

    #[ExcelProperty(value: "分组名称", index: 1)]
    public string $group_name;

    #[ExcelProperty(value: "创建者", index: 2)]
    public string $created_by;

    #[ExcelProperty(value: "更新者", index: 3)]
    public string $updated_by;

    #[ExcelProperty(value: "创建时间", index: 4)]
    public string $created_at;

    #[ExcelProperty(value: "更新时间", index: 5)]
    public string $updated_at;

    #[ExcelProperty(value: "删除时间", index: 6)]
    public string $deleted_at;

    #[ExcelProperty(value: "备注", index: 7)]
    public string $remark;


}