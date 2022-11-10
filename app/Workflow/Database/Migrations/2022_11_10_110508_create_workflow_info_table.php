<?php
/**
 * MineAdmin is committed to providing solutions for quickly building web applications
 * Please view the LICENSE file that was distributed with this source code,
 * For the full copyright and license information.
 * Thank you very much for using MineAdmin.
 *
 * @Author X.Mo<root@imoi.cn>
 * @Link   https://gitee.com/xmo/MineAdmin
 */

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateWorkflowInfoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workflow_info', function (Blueprint $table) {
            $table->engine = 'Innodb';
            $table->comment('工作流程表');
            $table->bigIncrements('id')->comment('主键');
            $table->addColumn('bigInteger', 'group_id', ['comment' => '所属流程组']);
            $table->addColumn('bigInteger', 'workflow_form_id', ['comment' => '所属业务表']);
            $table->addColumn('string', 'icon', [ 'length' => 32, 'comment' => '流程图标']);
            $table->addColumn('string', 'icon_bg_color', [ 'length' => 12, 'comment' => '图标背景颜色']);
            $table->addColumn('string', 'title', [ 'length' => 64, 'comment' => '流程标题']);
            $table->addColumn('string', 'desc', [ 'length' => 255, 'comment' => '流程简介']);
            $table->addColumn('smallInteger', 'status', ['default' => 1, 'comment' => '状态 (1-已发布 2-未发布)']);
            $table->addColumn('text', 'node_source', ['comment' => '节点源信息']);
            $table->addColumn('bigInteger', 'created_by', ['comment' => '创建者'])->nullable();
            $table->addColumn('bigInteger', 'updated_by', ['comment' => '更新者'])->nullable();
            $table->addColumn('timestamp', 'created_at', ['precision' => 0, 'comment' => '创建时间'])->nullable();
            $table->addColumn('timestamp', 'updated_at', ['precision' => 0, 'comment' => '更新时间'])->nullable();
            $table->addColumn('timestamp', 'deleted_at', ['precision' => 0, 'comment' => '删除时间'])->nullable();
            $table->addColumn('string', 'remark', ['length' => 255, 'comment' => '备注'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow');
    }
}
