[Source Code (GitHub)](https://github.com/Til7701/Fluxus){.accent-button .button}

Fluxus is an absolutely serious, low performance, interpreted programming language implemented in Java.
It features almost arbitrary width integers and no loops or if-statements.

Hello World can look like this in a class:

```fluxus
import fluxus.flumen.System;

class;

static main() {
    System.println("Hello World");
}
```

Or like this in a script:

```fluxus
import fluxus.flumen.System;

System.println("Hello World");
```

Hello World is a bit boring. So here is more code that does some nonsensical stuff. Can you find out what the output is?

```fluxus
import fluxus.flumen.System;
import fluxus.flumen.Str;

class;

static I64[U31] longs = [10I64, 9I64, 8I64, 7I64, 6I64, 5I64, 4I64, 3I64, 2I64];
U31 index = new 0U31;

(U31 index) {
    this.index = index;
}

static main() {
    let i = new 0I32;
    when i < 4I32 {
        let instance = Showcase(i as U31);
        instance.run(i as U31 * 2U31);
        i = i + 1I32;
    }
    i = new 1I32;
}

run(U31 upTo) {
    do when (this.index < Showcase.longs.length()) && (this.index <= upTo) {
        let long = This.longs[this.index];
        System.println(long as Str);
        this.index = this.index + 1U31;
    }
}
```

<details>
<summary>Spoiler: Output</summary>

```txt
9
8
8
7
6
7
6
5
4
```

</details>

### Primitives

- `Bool`: `true` and `false`
- `Char`: e.g. `'a'`
- `I#`: signed integer with `#` bits precision
- `U#`: unsigned integer with `#` bits precision
- `F#`: float with `#` bits precision where only 32 and 64 are supported (more may come in the future)
- `I8[I32]`: array instantiated with `[42I8, 10I8, 0I32]` as a literal or `[0I8; 10I32]` as an array with 10 elements
  containing the value `0I8` (`I8` can be replaced with any other type)

### Variables

Variables can be initialized using the keyword `let` and must start with a lower case letter.

```fluxus
let x = 5I32;
let b = true;
```

Literals can also be reassigned.

```fluxus
0I32 = 1I32;
System.println(0I32 as Str); // prints 1
```

Initializing a variable with a literal also couples that variable to the literal.

```fluxus
let a = 0U32;
a = 1I32;
System.println(0U32 as Str); // prints 1
```

This can be avoided by using the `new` keyword.
This copies the value to a new location in memory so subsequent changes to `a` do not modify the literal.

```fluxus
let a = new 0U32;
a = 1I32;
System.println(0U32 as Str); // prints 0
```

### Conditionals

There are not `if`-statements or loops. Both are very inferior and therefore replaced with `when` statements.
Whenever a variable in the condition changes, it is reevaluated and the body is executed if the condition is `true`.

```fluxus
when x < 10I32 {
    //...
}
```

To evaluate the condition without another reassignment, you can prefix the `when`-statement with `do`.
The following prints the numbers from 0 to 9.

```fluxus
let i = 0I32;
do when i < 10I32 {
    System.println(i as Str);
    i = i + 1I32;
}
```
