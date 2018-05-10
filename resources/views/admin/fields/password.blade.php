@extends('admin.fields.main')

@section('field')
	<input type="password" name="{{ $field }}" value="{{ old($field, (isset($entity) ? $entity->$field : '')) }}" class="form-control">
@overwrite
