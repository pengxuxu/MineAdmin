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

use App\Workflow\Mapper\WorkflowInfoMapper;
use Mine\Abstracts\AbstractService;

/**
 * 流程管理服务类
 */
class WorkflowInfoService extends AbstractService
{
    /**
     * @var WorkflowInfoMapper
     */
    public $mapper;

    public function __construct(WorkflowInfoMapper $mapper)
    {
        $this->mapper = $mapper;
    }
}