<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGroupeAPIRequest;
use App\Http\Requests\API\UpdateGroupeAPIRequest;
use App\Models\Groupe;
use App\Repositories\GroupeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GroupeController
 * @package App\Http\Controllers\API
 */

class GroupeAPIController extends AppBaseController
{
    /** @var  GroupeRepository */
    private $groupeRepository;

    public function __construct(GroupeRepository $groupeRepo)
    {
        $this->groupeRepository = $groupeRepo;
    }

    /**
     * Display a listing of the Groupe.
     * GET|HEAD /groupes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $groupes = Groupe::get();

        return $this->sendResponse($groupes->toArray(), 'Groupes retrieved successfully');
    }

    /**
     * Store a newly created Groupe in storage.
     * POST /groupes
     *
     * @param CreateGroupeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGroupeAPIRequest $request)
    {
        $input = $request->all();

        $groupe = Groupe::create($input);

        return $this->sendResponse($groupe->toArray(), 'Groupe saved successfully');
    }

    /**
     * Display the specified Groupe.
     * GET|HEAD /groupes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Groupe $groupe */
        $groupe = Groupe::where('id',$id)->first();

        if (empty($groupe)) {
            return $this->sendError('Groupe not found');
        }

        return $this->sendResponse($groupe->toArray(), 'Groupe retrieved successfully');
    }

    /**
     * Update the specified Groupe in storage.
     * PUT/PATCH /groupes/{id}
     *
     * @param int $id
     * @param UpdateGroupeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGroupeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Groupe $groupe */
        $groupe = Groupe::where('id',$id)->first();

        if (empty($groupe)) {
            return $this->sendError('Groupe not found');
        }

        $groupe->update($input);

        return $this->sendResponse($groupe->toArray(), 'Groupe updated successfully');
    }

    /**
     * Remove the specified Groupe from storage.
     * DELETE /groupes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Groupe $groupe */
        $groupe = Groupe::where('id',$id)->first();

        if (empty($groupe)) {
            return $this->sendError('Groupe not found');
        }

        $groupe->delete();

        return $this->sendSuccess('Groupe deleted successfully');
    }
}
