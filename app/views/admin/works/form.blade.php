{{ Former::string('title')->required() }}
{{ Former::string('slug') }}
{{ Former::textarea('content')->addClass('ckeditor')->required() }}
{{ Former::string('meta_title') }}
{{ Former::string('meta_description') }}
{{ Former::string('meta_keywords') }}
@if ($work->preview_updated_at)
   <div class="col-md-8 col-md-offset-4">
       {{ HTML::image($work->preview->url('medium')) }}
   </div>
   {{ Former::file('preview')->accept('image') }}
@else
   {{ Former::file('preview')->accept('image')->required() }}
@endif
{{ Former::select('rubrics[]')->fromQuery($rubrics, 'name', 'id')
                              ->select($work->rubrics()->getRelatedIds())
                              ->id('rubrics')
                              ->multiple() }}
<div class="form-group">
    <div class="pull-right col-lg-10 col-sm-8">
        <small class="text-muted">
            Введите название тега, и нажмите enter или запятую,
            чтобы подтвердить.
        </small>
    </div>
</div>
{{ Former::text('tags') }}
{{ Former::actions()
            ->large_primary_submit('Submit')
            ->large_inverse_reset('Reset') }}

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#tags').tokenfield();
			$('#rubrics').select2();
		});
	</script>
@stop