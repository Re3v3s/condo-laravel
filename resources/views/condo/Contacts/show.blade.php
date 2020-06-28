@extends('adminlte.dashboard')
@section('title','Show about Contact')
@section('content')
<style>
    @media print{
        html , body {
            height: 100%;
        }

        .card {
            height: 100%;
            margin: 0px 0px 0px 0px;
        }
        #cardmedia{
            height: 100%;
            margin: 0px 0px 0px 0px;
        }


    }
</style>
<div class="row justify-content-end mt-2 mb-2">
    <div class="col-md-4">
        <button class="float-right btn btn-primary" value="print" onclick="printCard('cardmedia');">ปริ้นใบสัญญา</button>
    </div>
</div>
    <div class="card" id="cardmedia" media="print">
        <div class="card-header bg-dark text-white">
            <h1 class="text-center">หนังสือเช่าห้องชุด</h1>
        </div>
        <div class="card-body">
            <div class="container">
                <p>หนังสือสัญญาเช่าฉบับนี้ ทำที่เมื่อวันที่ {{ $DataShows[0]->create_date }} สิ้นสุดสัญญาวันที่ {{$DataShows[0]->end_date}} ทำขึ้นระหว่าง <b> {{$DataShows[0]->firstname}} {{$DataShows[0]->lastname}} ที่อยู่ {{$DataShows[0]->c_address}} แขวง/เขต {{$DataShows[0]->c_dis}}
                    อำเภอ {{ $DataShows[0]->c_aum }} จังหวัด {{ $DataShows[0]->c_province }} </b> ซึ่งต่อไปในสัญญาฉบับนี้เรียกว่า "ผู้เช่า" ฝ่ายหนึ่งกับ <b> {{$Juris[0]->name}} {{$Juris[0]->lastname}}
                    อยู่บ้านเลขที่ {{$Juris[0]->address}} ตำบล {{ $Juris[0]->district }} อำเภอ {{ $Juris[0]->aumphur}} จังหวัด {{ $Juris[0]->province }} </b>ซึ่งต่อไปในสัญญาฉบับนี้เรียกว่า
                "ผู้ให้เช่าอีกฝ่ายหนึ่ง" ทั้งสองฝ่ายตกลงกันมีข้อความดังต่อไปนี้
            </p>

            <p>
            ข้อ 1.ผู้เช่าตกลงเช่าและผู้ให้เช่าตกลงให้เช่าห้องชุด หมายเลขห้อง {{ $DataShows[0]->r_name }} {{ $DataShows[0]->b_name }} ที่อยู่ {{ $DataShows[0]->b_add }} แขวง/ตำบล {{  $DataShows[0]->b_dis }} เขต/อำเภอ {{ $DataShows[0]->b_aum }}
                จังหวัด {{ $DataShows[0]->b_pro }} จำนวน ๑ ห้อง ในวันที่ทำสัญญาฉบับนี้เป็นต้นไป ในราคาค่าเช่าเดือนละ {{ $DataShows[0]->price }} บาท
            </p>

            <p>
                ข้อ 2.ผู้เช่าตกลงจ่ายค่าเช่าล่วงหน้าในวันทำสัญญา เป็นจำนวนเงิน {{ $DataShows[0]->earnest }} บาท
            </p>
            <p>
                ข้อ 3.ผู้เช่าตกลงชำระค่าเช่า ทุก ๆ วันที่ 1 ของเดือน เริ่มตั้งแต่เดือนที่ตกลงทำสัญญาเช่าฉบับนี้เป็นต้นไป โดยผู้เช่าตกลงเช่ามีกำหนด
                1 ปี หากครบกำหนดดังกล่าว ผู้เช่ามีสิทธิจะเช่าต่อไปในอัตราค่าเช่าเดิมก็ได้ โดยแจ้งล่วงหน้าให้ผู้เช่าทราบไม่น้อยกว่า 30 วัน
            </p>
            <p>
                ข้อ 4.ผู้ให้เช่าตกลงให้ผู้เช่าใช้สอยทรัพย์สินทุกชนิดที่อยู่ในห้องเช่าและตามรายการทรัพย์สินที่แนบท้ายสัญญา โดยผู้เช่าจะดูแลรักษาเสมือน
                ว่าเป็นทรัพย์สินของตน หากชำรุดบกพร่องใด ๆ ผู้เช่าจะต้องซ่อมแซมให้คงเดิมอยู่เสมอ
            </p>
            <p>
                ข้อ 5.ผู้เช่าตกลงที่จะดูแลรักษาห้องที่เช่าโดยให้คงสภาพดีดังเดิมทุกประการ และยินยอมให้ผู้ให้เช่า หรือผู้ที่จะได้รับมอบหมายเข้ามาในห้องที่เช่า
                ได้ตลอดเวลา เพื่อตรวจดูสภาพห้องที่เช่าได้ทุกเวลา โดยผู้เช่าให้สัญญาว่าจะไม่นำสิ่งผิดกฏหมายเข้ามาในห้องที่เช่า หากผู้ให้เช่าพบหรือบุคคลอื่น
                พบสิ่งผิดกฏหมาย ผู้เช่ายอมให้ผู้ให้เช่าบอกเลิกสัญญาเช่าได้ทันที
            </p>
            <p>
                ข้อ 6.การเช่าตามข้อ 1 ให้รวมถึงอุปกรณ์ หรือทรัพย์สินต่าง ๆ ที่อยู่ในห้องเช่าและ รายการทรัพย์สินตามรายการแนบท้ายหนังสือสัญญเช่านี้
            </p>
            <p>
                ข้อ 7.ผู้เช่าตกลงที่จะเช่าเพื่อเป็นที่พักอาศัยเท่านั้น และให้สัญญาว่าจะไม่นำห้องที่เช่าออกให้ผู้อื่นเช่าช่วง เว้นแต่จะได้รับความยินยอมเป็นหนังสือจาก
                ผู้ให้เช่า
            </p>
            <p>
                ข้อ 8.หากผู้เช่าผิดสัญญาข้อหนึ่งข้อใด ยอมให้ผู้ให้เช่าบอกเลิกสัญญาเช่าได้ทันที และยอมชดใช้ค่าเสียหาย ค่าขาดประโยชน์ตามความสมและตามสมควร
                เท่าที่ผู้ให้เช่าจะเสียหาย
            </p>
            <p>
                ข้อ 9.หากสัญญาเช่าสิ้นสุดลง โดยไม่มีการต่อสัญญาเช่า หรือผู้ให้เช่าบอกเลิกสัญญาเช่าตามข้อ 8 ดังกล่าว ผู้เช่ายอมขนย้ายทรัพย์สินและ
                บริวารออกไปจากห้องที่เช่าทันทีโดยค่าใช้จ่ายของผู้เช่าเอง
            </p>
            <p>
                ข้อ 10.ผู้เช่าสัญญาว่าจะปฏิบัติตามระเบียบข้อบังคับของอาคารโดยถือเป็นส่วนหนึ่งแห่งสัญญาเช่านี้ด้วย หากผู้เช่าไม่ปฏิบัติตาม หรือละเมิดข้อบังคับดังกล่าว
                ผู้เช่ายินดีให้ถือว่าสัญญานี้เป็นอันยกเลิกต่อกัน และยินยอมมอบการครอบครองห้องเช่าคืนแก่ผู้ให้เช่าทันที
            </p>
            <p>
                คู่สัญญาทั้งสองฝ่ายได้อ่านข้อความดังกล่าวแล้ว ตกลงที่จะทำสัญญาฉบับนี้ จึงลงลายมือชื่อไว้เป็นสำคัญ
            </p>
            <br>

        <div class="test">
            <div class="row justify-content-end">
                <div class="col-md-4">
                    <p>
                        ลงชื่อ........................ผู้เช่า
                        <br><br>
                        &nbsp; &nbsp;&nbsp; &nbsp;( {{$DataShows[0]->firstname}} {{$DataShows[0]->lastname}} )

                    </p>
                </div>
            </div>
        </div>



        <div class="test">
            <div class="row justify-content-end">
                <div class="col-md-4 col align-self-end">
                    <p>
                        ลงชื่อ........................ผู้ให้เช่า
                        <br>
                        &nbsp; &nbsp;&nbsp; &nbsp;(  {{$Juris[0]->name}} {{$Juris[0]->lastname}}  )
                    </p>
                </div>
            </div>
        </div>

        <div class="test">
            <div class="row justify-content-end">
                <div class="col-md-4">
                    <p>
                        ลงชื่อ........................พยาน
                        <br>
                        &nbsp; &nbsp;&nbsp; &nbsp;(.............................)
                    </p>
                </div>
            </div>
        </div>


        <div class="test">
            <div class="row justify-content-end">
                <div class="col-md-4">

                    <p>
                        ลงชื่อ........................พยาน
                        <br>
                        &nbsp; &nbsp;&nbsp; &nbsp;(.............................)
                    </p>
                </div>
            </div>
        </div>
            </div>
        </div>


    </div>
<script>
    function printCard(cardmedia) {
     var printContents = document.getElementById(cardmedia).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

@endsection
