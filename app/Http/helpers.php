<?php

function activateCategory($name) {

    if(str_contains(url()->current(), $name)) {
        return "class=active";
    } else {
        return '';
    }

}