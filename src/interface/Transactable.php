<?php

namespace interface;

interface Transactable
{
    public function deposit($amount);
    public function withdraw($amount);

}