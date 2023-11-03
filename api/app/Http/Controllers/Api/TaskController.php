<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @OA\Info(
 *   title="API - TodoList - Documentação",
 *   version="1.0.0",
 *   contact={
 *     "email": "helderatosta@gmail.com"
 *   }
 * )
 */
class TaskController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"Listar Tarefas"},
     *     summary="Listagem de Tarefas",
     *     description="Este endpoint lista todas as tarefas cadastradas na base de dados",
     *     path="/tasks",
     *     @OA\Response(
     *          response=200,
     *          description="Listagem",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="string", example="5"),
     *              @OA\Property(property="title", type="string", example="Título da tarefa"),
     *              @OA\Property(property="description", type="string", example="Descrição da tarefa cadastrada"),
     *              @OA\Property(property="priority", type="string", example="Alta|Baixa|Média"),
     *              @OA\Property(property="status", type="boolean", example="false|true"),
     *          )
     *     ),
     * ),
     */
    public function index() {
        $tasks = Task::all()
            ->sortBy('priority');

        return TaskResource::collection($tasks);
    }

     /**
     * @OA\Get(
     *     path="/tasks/{id}",
     *     description="Retornas a tarefa",
     *     operationId="findTaskById",
     *     tags={"Listar Tarefa Única"},
     *     @OA\Parameter(
     *         description="Id da tarefa",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Listagem",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="string", example="5"),
     *              @OA\Property(property="title", type="string", example="Título da tarefa"),
     *              @OA\Property(property="description", type="string", example="Descrição da tarefa cadastrada"),
     *              @OA\Property(property="priority", type="string", example="Alta|Baixa|Média"),
     *              @OA\Property(property="status", type="boolean", example="false|true"),
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function findTaskById(string $id) {
        $task = Task::findOrFail($id);

        return new TaskResource($task);
    }

    /**
    * @OA\Get(
    *     tags={"Listar Tarefas Pendentes"},
    *     summary="Listar as tarefas pendentes",
    *     description="Este endpoint lista apenas as tarefas que estão com o status como pendente",
    *     path="/pendingtasks",
    *     @OA\Response(
    *          response=200,
    *          description="Apresenta as Tarefa Pendentes",
    *          @OA\JsonContent(
    *              @OA\Property(property="id", type="string", example="5"),
    *              @OA\Property(property="title", type="string", example="Título da tarefa"),
    *              @OA\Property(property="description", type="string", example="Descrição da tarefa cadastrada"),
    *              @OA\Property(property="priority", type="string", example="Alta|Baixa|Média"),
    *              @OA\Property(property="status", type="boolean", example="false|true"),
    *          )
    *     ),
    * ),
    */
    public function listPendingTasks() {
        $tasks = Task::where('status', false)->get();

        //return new TaskResource($tasks);
        return $tasks;
    }

        /**
     * @OA\POST(
     *  tags={"Criação de uma nova tarefa"},
     *  summary="Criar Tarefa",
     *  description="Este endpoint é responsável pela criação de novas tarefas",
     *  path="/tasks",
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(
     *              required={"title","description","priority", "status"},
     *              @OA\Property(property="title", type="string", example="Nova Tarefa"),
     *              @OA\Property(property="description", type="string", example="Descrição da Tarefa"),
     *              @OA\Property(property="priority", type="string", example="Alta"),
     *              @OA\Property(property="status", type="string", example="false"),
     *          )
     *      ),
     *  ),
     *  @OA\Response(
     *    response=200,
     *    description="Nova tarefa criada",
     *    @OA\JsonContent(
     *       @OA\Property(property="plainTextToken", type="string", example="Nova tarefa criada com sucesso!")
     *    )
     *  ),
     * )
     */
    public function createTask(Request $request) {
        $data = $request->all();

        $task = Task::create($data);

        return new TaskResource($task);
    }

        /**
     * @OA\Put(
     *     path="/tasks/{id}",
     *     description="Apaga a tarefa com o ID informado na URL",
     *     operationId="updateTask",
     *     tags={"Atualizar Tarefa"},
     *     @OA\Parameter(
     *         description="ID da tarefa a ser atualizada",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             format="int64",
     *             type="integer"
     *         )
     *     ),
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"title","description","priority", "status"},
     *                  @OA\Property(property="title", type="string", example="Nova Tarefa"),
     *                  @OA\Property(property="description", type="string", example="Descrição da Tarefa"),
     *                  @OA\Property(property="priority", type="string", example="Alta"),
     *                  @OA\Property(property="status", type="string", example="false"),
     *              )
     *          ),
     *      ),
     *     @OA\Response(
     *         response=204,
     *         description="Tarefa Atualizada!"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function updateTask(Request $request, string $id) {
        $task = Task::findOrFail($id);

        $data = $request->all();
        $task->update($data);

        return new TaskResource($task);
    }

    /**
     * @OA\Delete(
     *     path="/tasks/{id}",
     *     description="Apaga a tarefa com o ID informado na URL",
     *     operationId="deleteTask",
     *     tags={"Excluir Tarefa"},
     *     @OA\Parameter(
     *         description="ID da tarefa a ser deletada",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             format="int64",
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Tarefa excluída"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    public function deleteTask(string $id) {
        $task = Task::findOrFail($id);

        $task->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);

    }
}
