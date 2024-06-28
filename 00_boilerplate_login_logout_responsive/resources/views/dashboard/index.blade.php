@extends('layouts.app')

@section('title', '메인 대시보드')

@section('content')

<style>
.table-responsive {
    height: 400px;
}
</style>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title 1</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title 2</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title 3</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title 1</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title 2</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title 3</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive" id="id-list">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Header 1</th>
                                <th>Header 2</th>
                                <th>Header 3</th>
                                <th>Header 4</th>
                                <th>Header 5</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive" id="id-list-form">
                    <table class="table table-striped table-sm">
                        <thead>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title 1</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title 2</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title 3</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title 1</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title 2</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title 3</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready( function() {
    viewList();
    viewListForm('id-list-form');
} );

function viewList() {
    $("#id-list").find("table").find("tbody").children().remove();

    let html = '';
    for (var i = 1; i < 20; i++) {
        html += `<tr>`;
        html += `   <td>${i}</td>`;
        html += `   <td>Data 1</td>`;
        html += `   <td>Data 2</td>`;
        html += `   <td>Data 3</td>`;
        html += `   <td>Data 4</td>`;
        html += `   <td>Data 5</td>`;
        html += `</tr>`;
    };

    $("#id-list").find("table").find("tbody").append(html);
}

function viewListForm(id) {
    let html = '';

    $(`#${id}`).find("table").find("thead").children().remove();

    html += `<tr>`
    html += `    <th>#</th>`;
    html += `    <th>Header 1</th>`;
    html += `    <th>Header 2</th>`;
    html += `    <th>Header 3</th>`;
    html += `</tr>`;

    $(`#${id}`).find("table").find("thead").append(html);

    $(`#${id}`).find("table").find("tbody").children().remove();

    html = '';
    for (var i = 1; i < 15; i++) {
        html += `<tr>`;
        html += `   <td>${i}</td>`;
        html += `   <td>Data 1</td>`;
        html += `   <td>Data 2</td>`;
        html += `   <td>Data 3</td>`;
        html += `</tr>`;
    };

    $(`#${id}`).find("table").find("tbody").append(html);
}

</script>

@endsection
