<?php

namespace BeBack\Services;

use BeBack\Models\UserGroup;
use Cache;

class UserGroupService
{
    
	private $userGroup;

	public function __construct(UserGroup $userGroup)
	{
		$this->userGroup = $userGroup;
	}

	private function query()
	{
		return $this->userGroup->query();
	}

	public function findUserGroupById($userId)
	{
		return $this->query()->find($userId);
	}

	public function list(array $search = [])
	{
		$searchString = data_get($search, 'searchString', false);
		$searchStatus = data_get($search, 'searchStatus', false);
		$query = $this->query();

		if ($searchString) {
			$query = $query->where(function($query) use($searchString) {
				return $query->where('name', 'like', "%{$searchString}%")
					->orWhere('description', 'like', "%{$searchString}%");
			});
		}

		if ($searchStatus) {
			$query = $query->where('status', $searchStatus);
		}

		return $query;
	}

	public function create(UserGroup $userGroup)
	{
		return $userGroup->save();
	}

	public function update(UserGroup $userGroup)
	{
		return $this->create($userGroup);
	}

	public function delete(UserGroup $userGroup)
	{
		return $userGroup->delete();
	}

}
