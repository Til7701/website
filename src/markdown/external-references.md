A collection of external references for various Tools and Languages I frequently use.

## Java

### Dependencies

#### Lombok

## Maven

### Plugins

#### Maven JLink Plugin

| Documentation                                                  | Sources                                                | Repository                                                                                      |
|----------------------------------------------------------------|--------------------------------------------------------|-------------------------------------------------------------------------------------------------| 
| [Apache](https://maven.apache.org/plugins/maven-jlink-plugin/) | [GitHub](https://github.com/apache/maven-jlink-plugin) | [Maven Central](https://mvnrepository.com/artifact/org.apache.maven.plugins/maven-jlink-plugin) |

<details>
<summary>Usage Example</summary>

TODO tabs with Unified and Modular POMs

<!-- @formatter:off -->
```xml
<packaging>jlink</packaging>

<build>
    <plugins>
        <plugin>
            <artifactId>maven-jlink-plugin</artifactId>
            <version>3.2.0</version>
            <extensions>true</extensions>
            <configuration>
                <launcher>name=module.name/org.example.Main</launcher>
                <noHeaderFiles>true</noHeaderFiles>
                <noManPages>true</noManPages>
                <stripDebug>true</stripDebug>
                <compress>zip-1</compress>
            </configuration>
        </plugin>
    </plugins>
</build>
```
<!-- @formatter:on -->

</details>

---

## DEB Packages
