### Budowniczy  
jest kreacyjnym wzorcem projektowym, który daje możliwość tworzenia złożonych obiektów etapami, krok po kroku. Wzorzec ten pozwala produkować różne typy oraz reprezentacje obiektu używając tego samego kodu konstrukcyjnego.

Identyfikacja: Wzorzec Budowniczy można poznać po klasie posiadającej jedną metodę kreacyjną i wiele metod służących konfiguracji tworzonego obiektu. Metody budowniczych można zwykle łańcuchować, na przykład:
 `someBuilder->setValueA(1)->setValueB(2)->create()`

**Problem**  
Na przykład pomyślmy, jak stworzyć obiekt Dom. Do zbudowania najprostszego domu wystarczą cztery ściany, podłoga, do tego drzwi, parę okien i dach. Ale co, jeśli chcesz większy, jaśniejszy dom z podwórkiem i innymi dodatkami (ogrzewanie, kanalizacja, elektryczność)?

Najprostsze rozwiązanie to rozszerzenie klasy bazowej Dom i stworzenie zestawu podklas, które spełniałyby każdy możliwy zestaw wymogów. Ale takie podejście doprowadzi do wielkiej liczby podklas. Dodanie kolejnego parametru, jak styl werandy, jeszcze bardziej rozbuduje tę hierarchię.

Istnieje jednak inne rozwiązanie, które nie wiąże się z mnożeniem podklas. Można stworzyć jeden wielki konstruktor w klasie bazowej Dom, uwzględniający wszystkie możliwe parametry, które sterują obiektem typu dom. W ten sposób nie mnożymy liczby klas, ale tworzymy nieco inny problem.

**Rozwiązanie**  
Wzorzec projektowy Budowniczy proponuje ekstrakcję kodu konstrukcyjnego obiektu z jego klasy i umieszczenie go w osobnych obiektach zwanych budowniczymi.

Ten wzorzec projektowy dzieli konstrukcję obiektu na pewne etapy (budujŚciany, wstawDrzwi, itd.). Aby powołać do życia obiekt, wykonuje się ciąg takich etapów za pośrednictwem obiektu-budowniczego. Istotne jest to, że nie musisz wywoływać wszystkich etapów. Możesz bowiem ograniczyć się tylko do tych kroków, które są niezbędne do określenia potrzebnej nam konfiguracji obiektu.

Niektóre etapy konstrukcji mogą wymagać odmiennych implementacji, zależnie od potrzebnej w danej chwili reprezentacji produktu. Na przykład, ściany leśnej chatki mogą być drewniane, ale mury zamku warownego — kamienne.

**Zastosowania**  
Jedno z najlepszych zastosowań wzorca Budowniczy to budowniczy zapytań SQL. Interfejs budowniczego definiuje etapy wspólne dla zbudowania typowego zapytania SQL, a konkretni budowniczy (odpowiadający różnym dialektom SQL) implementują te etapy zwracając elementy zapytania zgodne z danym silnikiem bazodanowym.