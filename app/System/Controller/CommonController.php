<?php

declare(strict_types=1);
namespace App\System\Controller;

use App\System\Service\SystemDeptService;
use App\System\Service\SystemLoginLogService;
use App\System\Service\SystemNoticeService;
use App\System\Service\SystemOperLogService;
use App\System\Service\SystemPostService;
use App\System\Service\SystemRoleService;
use App\System\Service\SystemUploadFileService;
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

    #[Inject]
    protected SystemUploadFileService $service;

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

    #[GetMapping("getResourceList")]
    public function getResourceList(): ResponseInterface
    {
        return $this->success($this->service->getPageList($this->request->all()));
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

    #[GetMapping("getDemoList")]
    public function getDemoList(): ResponseInterface
    {
        $key = $this->request->input('key');

        if ($key == '1') {
            return $this->success([
                [
                    'color' => 'red',
                    'size' => '55',
                    'amount' => 199.99,
                    'fahuodi' => '中国 北京',
                    'tax' => 1.9,
                    'tax_amount' => 2,
                    'chuchandi' => '浙江 温州',
                    'datetime' => date('Y-m-d H:i:s'),
                ],
                [
                    'color' => 'blue',
                    'size' => '66',
                    'amount' => 2000,
                    'fahuodi' => '中国 北京',
                    'tax' => 20,
                    'tax_amount' => 20,
                    'chuchandi' => '浙江 温州',
                    'datetime' => date('Y-m-d H:i:s'),
                ]
            ]);
        }
        if ($key == '2') {
            return $this->success([
                [
                    'color' => 'zise',
                    'size' => '99',
                    'amount' => 100,
                    'fahuodi' => '中国 南京',
                    'tax' => 1,
                    'tax_amount' => 1,
                    'chuchandi' => '浙江 温州',
                    'datetime' => date('Y-m-d H:i:s'),
                ],
                [
                    'color' => 'green',
                    'size' => '88',
                    'amount' => 200,
                    'fahuodi' => '中国 北京',
                    'tax' => 2,
                    'tax_amount' => 2,
                    'chuchandi' => '浙江 温州',
                    'datetime' => date('Y-m-d H:i:s'),
                ],
                [
                    'color' => 'black',
                    'size' => '77',
                    'amount' => 5000,
                    'fahuodi' => '中国 河北',
                    'tax' => 50,
                    'tax_amount' => 50,
                    'chuchandi' => '浙江 杭州',
                    'datetime' => date('Y-m-d H:i:s'),
                ]
            ]);
        }
        return $this->success([]);
    }

    #[GetMapping("getColor")]
    public function getColor(): ResponseInterface
    {
        return $this->success([
            ['label' => '红色', 'value' => 'red'],
            ['label' => '蓝色', 'value' => 'blue'],
            ['label' => '紫色', 'value' => 'zise'],
            ['label' => '绿色', 'value' => 'green'],
            ['label' => '黑色', 'value' => 'black'],
        ]);
    }

    #[GetMapping("getSize")]
    public function getSize(): ResponseInterface
    {
        return $this->success([
            ['label' => '55', 'value' => '55'],
            ['label' => '66', 'value' => '66'],
            ['label' => '77', 'value' => '77'],
            ['label' => '88', 'value' => '88'],
            ['label' => '99', 'value' => '99'],
        ]);
    }

    #[GetMapping("cascader")]
    public function cascader(): ResponseInterface
    {
        $key = $this->request->input('key');

        if ($key == '1') {
            return $this->success([
                ['label' => '红色', 'value' => 'red', 'disabled' => true ],
                ['label' => '蓝色', 'value' => 'blue'],
            ]);
        } else if ($key == '2') {
            return $this->success([
                ['label' => '紫色', 'value' => 'zise'],
                ['label' => '绿色', 'value' => 'green'],
                ['label' => '黑色', 'value' => 'black'],
            ]);
        } else {
            return $this->success([]);
        }
    }

    #[GetMapping("cascader2")]
    public function cascader2(): ResponseInterface
    {
        $key = $this->request->input('key');

        if ($key == 'red') {
            return $this->success([
                ['label' => '55', 'value' => '55'],
                ['label' => '66', 'value' => '66'],
            ]);
        } else if ($key == 'blue') {
            return $this->success([
                ['label' => '77', 'value' => '77'],
                ['label' => '88', 'value' => '88'],

            ]);
        } else {
            return $this->success([]);
        }
    }
}