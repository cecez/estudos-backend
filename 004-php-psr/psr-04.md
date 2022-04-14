# PSR-4: Autoloader
https://www.php-fig.org/psr/psr-4/

This PSR describes a specification for autoloading classes from file paths

## Specification

1. The term "class" refers to classes, interfaces, traits, and other similar structures.
2. A fully qualified class name has the following form:
\<NamespaceName>(\<SubNamespaceNames>)*\<ClassName>
   1. The fully qualified class name MUST have a top-level namespace name, also known as a "vendor namespace".
   2. The fully qualified class name MAY have one or more sub-namespace names.
   3. The fully qualified class name MUST have a terminating class name.
   4. Underscores have no special meaning in any portion of the fully qualified class name.
   5. Alphabetic characters in the fully qualified class name MAY be any combination of lower case and upper case.
   6. All class names MUST be referenced in a case-sensitive fashion.
3. When loading a file that corresponds to a fully qualified class name ...
   1. A contiguous series of one or more leading namespace and sub-namespace names, not including the leading namespace separator, in the fully qualified class name (a "namespace prefix") corresponds to at least one "base directory".
   2. The contiguous sub-namespace names after the "namespace prefix" correspond to a subdirectory within a "base directory", in which the namespace separators represent directory separators. The subdirectory name MUST match the case of the sub-namespace names.
   3. The terminating class name corresponds to a file name ending in .php. The file name MUST match the case of the terminating class name.
4. Autoloader implementations MUST NOT throw exceptions, MUST NOT raise errors of any level, and SHOULD NOT return a value.


