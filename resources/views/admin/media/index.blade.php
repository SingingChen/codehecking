@extends('layouts.admin')

@section('content')

    <h1>Medias</h1>

    @if($photos)

        <form action="delete/media" method="post" class="form-inline">
            {{csrf_field()}}
            {{method_field('delete')}}

            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="">Delete</option>
                </select>

            </div>
            <div class="form-group">
                <input type="submit" name="delete_all" class="form-control btn btn-primary">
                
            </div>

             <table class="table">
                 <thead>
                   <tr>
                     <th><input type="checkbox" id="options" ></th>
                     <th>Id</th>
                     <th>Photo</th>
                     <th>Create Date</th>
                     <th>Delete</th>

                   </tr>
                 </thead>
                 <tbody>
                 @foreach($photos as $photo)
                   <tr>
                     <td><input type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}" class="checkBoxes"></td>
                     <td>{{$photo->id}}</td>
                     <td><img height="50" src="{{$photo->file ? $photo->file:'No Image'}}" alt=""></td>
                     <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Photo'}}</td>
                     <td>
                              <div class="form-group">
                                  <input type="hidden" name="photo" value="{{$photo->id}}">
                                  <input type="submit" class="btn btn-danger" value="Delete" name="delete_single">
                              </div>
                     </td>
                   </tr>
                  @endforeach
                 </tbody>
               </table>
        </form>
     @endif


    @stop

@section('scripts')
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script>
        $('#options').click(function () {

            if(this.checked) {
                $('.checkBoxes').each(function () {
                    this.checked = true;
                });
            }else{
                $('.checkBoxes').each(function () {
                    this.checked = false;
                });

            }
        })




    </script>




    @stop
