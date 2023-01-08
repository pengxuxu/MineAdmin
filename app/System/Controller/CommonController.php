<?php

declare(strict_types=1);
namespace App\System\Controller;

use App\System\Service\SystemDeptService;
use App\System\Service\SystemLoginLogService;
use App\System\Service\SystemNoticeService;
use App\System\Service\SystemOperLogService;
use App\System\Service\SystemPostService;
use App\System\Service\SystemRoleService;
use App\System\Service\SystemUserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Mine\Annotation\Auth;
use Mine\MineController;
use Psr\Http\Message\ResponseInterface;

/**
 * 公共方法控制器
 * Class CommonController
 * @package App\System\Controller
 */
#[Controller(prefix: "system/common"), Auth]
class CommonController extends MineController
{
    #[Inject]
    protected SystemUserService $userService;

    #[Inject]
    protected SystemDeptService $deptService;

    #[Inject]
    protected SystemRoleService $roleService;

    #[Inject]
    protected SystemPostService $postService;

    #[Inject]
    protected SystemNoticeService $noticeService;

    #[Inject]
    protected SystemLoginLogService $loginLogService;

    #[Inject]
    protected SystemOperLogService $operLogService;

    /**
     * 获取用户列表
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping("getUserList")]
    public function getUserList(): ResponseInterface
    {
        return $this->success($this->userService->getPageList($this->request->all()));
    }

    /**
     * 通过 id 列表获取用户基础信息
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[PostMapping("getUserInfoByIds")]
    public function getUserInfoByIds(): ResponseInterface
    {
        return $this->success($this->userService->getUserInfoByIds((array) $this->request->input('ids', [])));
    }

    /**
     * 获取部门树列表
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping("getDeptTreeList")]
    public function getDeptTreeList(): ResponseInterface
    {
        return $this->success($this->deptService->getSelectTree());
    }

    /**
     * 获取角色列表
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping("getRoleList")]
    public function getRoleList(): ResponseInterface
    {
        return $this->success($this->roleService->getList());
    }

    /**
     * 获取岗位列表
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping("getPostList")]
    public function getPostList(): ResponseInterface
    {
        return $this->success($this->postService->getList());
    }

    /**
     * 获取公告列表
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping("getNoticeList")]
    public function getNoticeList(): ResponseInterface
    {
        return $this->success($this->noticeService->getPageList($this->request->all()));
    }

    /**
     * 获取登录日志列表
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping("getLoginLogList")]
    public function getLoginLogPageList(): \Psr\Http\Message\ResponseInterface
    {
        return $this->success($this->loginLogService->getPageList($this->request->all()));
    }

    /**
     * 获取操作日志列表
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping("getOperationLogList")]
    public function getOperLogPageList(): \Psr\Http\Message\ResponseInterface
    {
        return $this->success($this->operLogService->getPageList($this->request->all()));
    }

    /**
     * 清除所有缓存
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping("clearAllCache")]
    public function clearAllCache(): ResponseInterface
    {
        $this->userService->clearCache((string) user()->getId());
        return $this->success();
    }

    #[GetMapping("getOk")]
    public function getOk(): ResponseInterface
    {
        $key = $this->request->input('key');
        if ($key == '1') {
            return $this->success([
                ['label' => 'AA1', 'value' => 'AA1'],
                ['label' => 'BB1', 'value' => 'BB1'],
                ['label' => 'CC1', 'value' => 'CC1'],
                ['label' => 'DD1', 'value' => 'DD1'],
                ['label' => 'EE1', 'value' => 'EE1'],
            ]);
        }

        if ($key == '2') {
            return $this->success([
                ['label' => 'AA2', 'value' => 'AA2'],
                ['label' => 'BB2', 'value' => 'BB2'],
                ['label' => 'CC2', 'value' => 'CC2'],
                ['label' => 'DD2', 'value' => 'DD2'],
                ['label' => 'EE2', 'value' => 'EE2'],
            ]);
        }

        return $this->success([]);
    }

    #[GetMapping("getOk2")]
    public function getOk2(): ResponseInterface
    {
        $key = $this->request->input('key');
        if ($key == 'AA1') {
            return $this->success([
                ['label' => 'AA1', 'value' => 'AA1'],
                ['label' => 'AB1', 'value' => 'AB1'],
                ['label' => 'AC1', 'value' => 'AC1'],
                ['label' => 'AD1', 'value' => 'AD1'],
                ['label' => 'AE1', 'value' => 'AE1'],
            ]);
        }
        if ($key == 'BB1') {
            return $this->success([
                ['label' => 'BA1', 'value' => 'BA1'],
                ['label' => 'BB1', 'value' => 'BB1'],
                ['label' => 'BC1', 'value' => 'BC1'],
                ['label' => 'BD1', 'value' => 'BD1'],
                ['label' => 'BE1', 'value' => 'BE1'],
            ]);
        }

        if ($key == 'CC1') {
            return $this->success([
                ['label' => 'CA1', 'value' => 'CA1'],
                ['label' => 'CB1', 'value' => 'CB1'],
                ['label' => 'CC1', 'value' => 'CC1'],
                ['label' => 'CD1', 'value' => 'CD1'],
                ['label' => 'CE1', 'value' => 'CE1'],
            ]);
        }
        return $this->success([
            ['label' => 'ZA1', 'value' => 'ZA1'],
            ['label' => 'ZB1', 'value' => 'ZB1'],
            ['label' => 'ZC1', 'value' => 'ZC1'],
            ['label' => 'ZD1', 'value' => 'ZD1'],
            ['label' => 'ZE1', 'value' => 'ZE1'],
        ]);
    }
}