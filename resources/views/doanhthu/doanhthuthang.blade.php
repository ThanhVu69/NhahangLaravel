 <!-- DOANH THU THÁNG -->
 <div class="row">
     <div class="col-xs-6">
         <div class="box box-info">
             <div class="box-body">
                 <table id="example2" class="table table-bordered table-hover">
                     <thead>
                         <tr role="row">
                             <th>Tháng</th>
                             <th>Doanh thu</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($dtthang as $h)
                         <tr>
                             <td>{{$h->date}}</td>
                             <td>{{number_format($h->DT)}}.000VNĐ</td>
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
     <!-- DOANH THU NĂM -->
     <div class="col-xs-6">
         <div class="box box-info">
             <div class="box-body">
                 <table id="example3" class="table table-bordered table-hover">
                     <thead>
                         <tr role="row">
                             <th>Năm</th>
                             <th>Doanh thu</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($dtnam as $hhh)
                         <tr>
                             <td>{{$hhh->date}}</td>
                             <td>{{number_format($hhh->DT)}}.000VNĐ</td>
                         </tr>
                         @endforeach
                     </tbody>
                     </tfoot>
                 </table>
             </div>
         </div>
     </div>
 </div>