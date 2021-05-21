<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Zelvad\MyWarehouse\Warehouse;

class AllController extends Controller
{
    /**
     * @var Warehouse
     */
    private Warehouse $warehouse;

    /**
     * AllController constructor.
     */
    public function __construct()
    {
        $this->warehouse = new Warehouse(
            env('MY_WAREHOUSE_API_TOKEN')
        );
    }

    /**
     * Create webhook
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        /**
         * Получаем данные для БД
         */
        $data = $this->warehouse->create(
            $request->all()
        );

        /**
         * Проверяем ответ
         */
        if (!$data) {
            return response()->json('error http', 500);
        }

        /**
         * Сохраняем в БД
         */
        $newCategory = Category::query()->create($data);

        return response()->json('success');
    }

    /**
     * Update webhook
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        /**
         * Получаем данные для БД
         */
        $data = collect($this->warehouse->update(
            $request->all()
        ));

        /**
         * Проверяем ответ
         */
        if (!$data) {
            return response()->json('error http', 500);
        }

        /**
         * Поиск записи в БД
         */
        $updateCategory = Category::query()
            ->findOrFail($data->get('id'));

        /**
         * Обновляем запись
         */
        $updateCategory->update(
            $data->except('id')->toArray()
        );

        return response()->json('success');
    }

    /**
     * Delete webhook
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request): JsonResponse
    {
        /**
         * Получаем данные для БД
         */
        $data = collect($this->warehouse->delete(
            $request->all()
        ));

        /**
         * Проверяем ответ
         */
        if (!$data) {
            return response()->json('error http', 500);
        }

        /**
         * Поиск записи в БД
         */
        $deleteCategory = Category::query()
            ->findOrFail($data['id']);

        /**
         * Удаление записи из БД
         */
        $deleteCategory->delete();

        return response()->json('success');
    }
}
