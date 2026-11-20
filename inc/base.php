<?php
function base(string $chemin): string
{
    return dirname(__DIR__) . '/' . $chemin;
}