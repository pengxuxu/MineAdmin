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

namespace App\Workflow\Service;

use App\Workflow\Mapper\WorkflowGroupMapper;
use Mine\Abstracts\AbstractService;

/**
 * 流程分组服务类
 */
class WorkflowGroupService extends AbstractService
{
    /**
     * @var WorkflowGroupMapper
     */
    public $mapper;

    public function __construct(WorkflowGroupMapper $mapper)
    {
        $this->mapper = $mapper;
    }
}