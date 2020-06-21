<div class="container_postBlog">
    <div class="container_postBlog">
        <form action="/action_page.php">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="fname" class="myP2">&#128442;Titlu</label>
                        <input type="text" class="myP2" id="fname" name="firstname" placeholder="Tehnologia în viața de zi cu zi">
                    </div>
                    <div class="col-sm-6">
                        <label for="lname" class="myP2">&#128441;Subtitlu</label>
                        <input type="text" class="myP2" id="lname" name="lastname" placeholder="Cum ne ajută tehnologia în fiecare zi. Partea I">
                    </div>
                </div>
                <div class="row" style="margin-top: 20px!important;margin-left: 0px!important">
                    <ul>
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Style
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="selectStyle('b')"><b>Bold</b></a>
                                    <a class="dropdown-item" onclick="selectStyle('i')"><i>Italic</i></a>
                                    <a class="dropdown-item" onclick="selectStyle('sup')"><sup>Upperscript</sup></a>
                                    <a class="dropdown-item" onclick="selectStyle('sub')"><sub>Subscript</sub></a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" style="margin-right: 0px;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown link
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <input type="color" name="colorpicker" id="colorpicker" value="#00ff40" style="width: 25px;height: 25px;">
                            <button type="button" class="btn btn-secondary" onclick="getColor()" style="margin-top: -20px;">Salvează culoare</button>
                        </li>

                    </ul>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="textArea1" class="myP2">&#128394;Text blog</label>
                        <textarea name="text" class="myP2" id="textArea1" onselect="getSelectedText()" placeholder="Aici poți scrie..."></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12" style="display: flex; justify-content: space-around;">
                        <input type="button" value="Cancel" class="button btn btn-danger" onclick="cleanTextArea()">
                        <!-- <button type="button" onclick="setText()" class="button btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Demo text
                        </button> -->
                        <button type="button" onclick="setText()" class="button btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Demo text
                        </button>
                        <!-- </div> -->
                        <!-- <div class="col-sm"> -->
                        <input type="button" id="btn_success_post" class="button btn btn-success" style="float: right;" value="Postează">
                    </div>
                </div>
            </div>
    </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="font-size: 20px">Asa va arata textul dv:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="whereToShow" style="font-size: 20px">
            <!-- <p id="whereToShow">

            </p> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>