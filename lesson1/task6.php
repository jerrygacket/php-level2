<?php
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); // 1
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2

// вывод
// 1122

/*
 * В отличие от предыдущей задачи, здесь происходит наследование метода foo
 * (создание еще одного динамического метода) в классе В
 * И поэтому создается новая статическая переменная $x/
 */