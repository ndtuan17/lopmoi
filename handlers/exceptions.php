<?php

function handleException(Throwable $e){
  writeLog(var_export($e, true));
}