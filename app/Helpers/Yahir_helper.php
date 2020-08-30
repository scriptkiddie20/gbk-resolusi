<?php

function is_logged_in()
{
    if (!session('email')) {
        return redirect()->to('/auth');
    }
}
