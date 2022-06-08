# shell_via_http

I'm using a shared hosting and have no access to shell via ssh

So I made a little command line program using python which connects to an api which I wote in php+laravel 

Using this tool I'm able to execute most of the shell commands which I have privilege to.

For me php shell_exec throws "shell_exec is disabled for security reason"

But fortunately I'm able to run php exec command

With some minor modification you can make the program to use shell_exec instead

By the way Laravel is n't really needed here and the only laravel dependent method here is $request->input() which you can use $_POST[] instead


