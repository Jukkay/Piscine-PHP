#!/usr/bin/env php
<?php

if ($argc == 1)
	return;
print(preg_replace('/[\t\s]+/', ' ', $argv[1]) . "\n");
