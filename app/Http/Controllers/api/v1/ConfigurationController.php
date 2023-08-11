<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductType\Configuration\StoreConfigurationRequest;
use App\Http\Requests\ProductType\Configuration\UpdateConfigurationRequest;
use App\Models\Configuration;
use App\Models\ProductType;
use App\Services\ConfigurationService;
use Symfony\Component\HttpFoundation\Response;

class ConfigurationController extends Controller
{
    public function __construct(private readonly ConfigurationService $configurationService)
    {
        $this->middleware('auth.role:admin', ['only' => ['update', 'destroy']]);
    }

    public function store(StoreConfigurationRequest $request, ProductType $productType) {
        $validated = $request->validated();

        return $this->configurationService->store($validated, $productType);
    }

    public function update(UpdateConfigurationRequest $request, ProductType $productType, Configuration $configuration)
    {
        $validated = $request->validated();

        return $this->configurationService->update($validated, $productType, $configuration);
    }

    public function destroy(Configuration $configuration)
    {
        $this->configurationService->destroy($configuration);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
