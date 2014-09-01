<div class="row">
	<div class="span5">
		<h2>{{LL('cms::title.files', CMSLANG)}}</h2>
	</div>
	<div class="span7 toright">		
		<div class="row">
			<div class="input-prepend">
				<span class="add-on">{{LL('cms::form.with_ext', CMSLANG)}}:</span>
				<span class="add-on ext" rel="{{$ext}}">
				@foreach($extensions as $ext)
					<label class="checkbox inline">
						{{Form::checkbox($ext, 1, in_array($ext, $extensions_selected)).$ext}}
					</label>
				@endforeach
				</span>
			</div>
		</div>
		<div class="row">
			<div class="input-prepend">
				<span class="add-on">{{LL('cms::form.owned_by', CMSLANG)}}:</span>
				{{Form::select('file_path', CmsPage::select_top_slug(LANG, 0, true, 'form.any_page'), $page, array('id' => 'change_file_path', 'class' => 'span6'))}}
			</div>
		</div>
	</div>
</div>

<div class="row space">
	<div class="span12">
		<table class="table table-striped fixed v-middle">
			<col width="8%">
			<col width="77%">
			<col width="15%">
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th>{{LL('cms::label.filename', CMSLANG)}}</th>
					<th>{{LL('cms::label.actions', CMSLANG)}}</th>
				</tr>
			</thead>
			<tbody class="listing">
				@forelse ($data->results as $file)

				<?php

					$file_id = (isset($file->cmsfile_id)) ? $file->cmsfile_id : $file->id;

				?>

				<tr class="post">
					<td>
						@if (MEDIA_TYPE($file->ext) == 'img')
						<a href="{{BASE.$file->path}}" class="thumbnail fancy" rel="tooltip" data-original-title="{{$file->name}}">							
							<img src="{{BASE.$file->thumb}}" width="50" heigth="50" alt="">							
						</a>
						@else
						<a href="{{BASE.$file->path}}" class="thumbnail" rel="tooltip" data-original-title="{{$file->name}}">							
							<img src="{{BASE}}/bundles/cms/img/{{$file->ext}}_ico.png" width="100" heigth="100" alt="">							
						</a>
						@endif
					</td>
					<td class="v-middle">
						{{--D($file)--}}
					{{HTML::span($file->name, array('class' => 'pop-over', 'rel' => $file_id, 'data-original-title' => LL('cms::title.popover_title_media', CMSLANG)))}}
					</td>
                    <td>                    	

                    	<div class="btn-toolbar">
							<div class="btn-group">
								<a href="{{action('cms::file@edit', array($file_id))}}" class="btn btn-mini">{{LL('cms::button.edit', CMSLANG)}}</a>
							</div>
							<div class="btn-group">
								<a href="#modal-delete-{{$file_id}}" class="btn btn-mini btn-danger" data-toggle="modal">{{LL('cms::button.delete', CMSLANG)}}</a>
							</div>
						</div>

						<div class="modal hide" id="modal-delete-{{$file_id}}">
							{{Form::open(action('cms::file@delete'), 'POST')}}
							{{Form::hidden('file_id', $file_id)}}
							<div class="modal-header">
								<button class="close" data-dismiss="modal">×</button>
								<h3>{{LL('cms::form.modal_title_file', CMSLANG)}}</h3>
							</div>
							<div class="modal-body">
								<p>{{$file->name}}</p>
							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">{{LL('cms::button.close', CMSLANG)}}</a>
								{{Form::submit(LL('cms::button.delete', CMSLANG), array('class' => 'btn btn-danger'))}}
							</div>
							{{Form::close()}}
						</div>
						
                    </td>
				</tr>
				@empty
				<tr>
					<td colspan="3" class="toleft">{{LL('cms::alert.list_empty', CMSLANG)}}</td>
				</tr>
				@endforelse

				@if($data->total > Config::get('cms::theme.pag') and $data->page < $data->last)
				<tr class="navigation">
					<td colspan="4">{{$data->next()}}</td>
				</tr>
				@endif
				
			</tbody>
		</table>
		
	</div>
</div>
