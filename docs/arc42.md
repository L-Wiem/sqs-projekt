# Event-Management-Anwendung Architektur

## Einführung

Dieses Dokument beschreibt die Architektur der Event-Management-Anwendung. Die Anwendung wird mit Laravel, einem PHP-Webframework, entwickelt und verwendet MySQL als Datenbank. Dieses Dokument deckt verschiedene Aspekte der Anwendung ab, einschließlich ihrer Architektur, Komponenten und Teststrategien.

## Inhaltsverzeichnis

1. [Einführung](#einführung)
2. [Anforderungen](#anforderungen)
3. [Lösungsstrategie](#lösungsstrategie)
4. [Bausteine](#bausteine)
    - [Frontend](#frontend)
    - [Backend](#backend)
    - [Datenbank](#datenbank)
5. [Laufzeitsicht](#laufzeitsicht)
6. [Bereitstellungssicht](#bereitstellungssicht)
7. [Querschnittliche Konzepte](#querschnittliche-konzepte)
8. [Tests](#tests)
    - [Unit Tests](#unit-tests)
    - [Integrationstests](#integrationstests)
    - [End-to-End Tests](#end-to-end-tests)
    - [Sicherheitstests](#sicherheitstests)
    - [Lasttests](#lasttests)

## Anforderungen

Die Event-Management-Anwendung muss folgende Anforderungen erfüllen:

- Benutzerregistrierung und -authentifizierung
- Verwaltung von Veranstaltungen (Erstellen, Bearbeiten, Löschen)
- Anmeldefunktion für Veranstaltungen
- Rollen- und Berechtigungssystem (Veranstalter, Teilnehmer)

## Lösungsstrategie

Die Anwendung wird auf Basis der folgenden Technologien entwickelt:

- **Frontend**: Blade Templates (Laravel), CSS, JavaScript 
- **Backend**: Laravel Framework (PHP)
- **Datenbank**: MySQL

Die Anwendung wird in einer serviceorientierten Architektur aufgebaut, wobei jede Komponente ihre eigene spezifische Funktionalität hat.

## Bausteine

### Frontend

Das Frontend der Anwendung verwendet Laravel Blade Templates zur Darstellung der Benutzeroberfläche. Es beinhaltet:

- Benutzeroberfläche für die Registrierung und Anmeldung
- Verwaltungsoberfläche für Veranstaltungen und Veranstaltungsorte
- Dashboard für Teilnehmer und Veranstalter

### Backend

Das Backend besteht aus mehreren Modulen, die über Laravel-Controller und -Services organisiert sind:

- **Benutzerverwaltung**: Registrierung, Anmeldung
- **Veranstaltungsverwaltung**: CRUD-Operationen (Create, Read, Update, Delete) für Veranstaltungen

### Datenbank

Die MySQL-Datenbank enthält mehrere Tabellen zum Speichern von Benutzern, Ereignissen, Adressen und Reservierungen. Ein vereinfachtes ER-Diagramm sieht wie folgt aus:

- **users**: enthält Benutzerinformationen (id, name, email, password)
- **events**: enthält Veranstaltungsdetails (id, title, description, date, address, capacity, is_online, category_id)
- **categories**: enthält Veranstaltungskategorien (id, name)
- **reservations**: enthält Anmeldungen zu Veranstaltungen (id, user_id, event_id)

![Alt text](./db-schema.png?raw=true "Title")


## Laufzeitsicht

In der Laufzeitsicht wird beschrieben, wie die verschiedenen Komponenten der Anwendung zur Laufzeit interagieren. Ein typischer Ablauf könnte folgendermaßen aussehen:

1. Ein Benutzer registriert sich oder meldet sich an.
2. Nach erfolgreicher Authentifizierung kann der Benutzer Veranstaltungen erstellen, bearbeiten oder sich zu ihnen anmelden.
3. Veranstaltungsdetails werden in der MySQL-Datenbank gespeichert.

## Bereitstellungssicht

Die Anwendung kann auf einem LNMP-Stack-Job (Linux, Nginx, MySQL, PHP) bereitgestellt werden, oder mit Docker-Containern. Ein typisches Bereitstellungsszenario könnte folgendermaßen aussehen:

- **Webserver**: Nginx auf einem Linux-Server
- **Datenbankserver**: MySQL auf demselben oder einem separaten Server
- **Anwendungscode**: Laravel-Anwendung im `/var/www` Verzeichnis


## Docker-Setup

Das beigefügte Docker Compose Setup dient der Containerisierung der Anwendung und der Orchestrierung der verschiedenen Dienste.

## Querschnittliche Konzepte

### Sicherheit

- **Authentifizierung**: Laravel Auth
- **Autorisierung**: Laravel Gate und Policy
- **Sicherheitsmaßnahmen**: Verwendung von HTTPS, Schutz vor CSRF, Validierung und Sanitisierung von Benutzereingaben

### Wartbarkeit

- **Modularität**: Klare Trennung der Module (Benutzerverwaltung, Veranstaltungsverwaltung, etc.)
- **Tests**: Umfangreiche Testabdeckung (Unit, Integration, E2E, Sec)

## Tests

- Alle Testabdeckungsberichte werden hier generiert [tests/reports/coverage](./../tests/reports/coverage)
- [Überprüfen Sie die Code-Coverage-Berichte](./../tests/reports/coverage/index.html)
- Die Testabdeckung kann durch Ausführen der folgenden Befehle im App-Docker-Container generiert werden
````
php artisan test --coverage-html tests/reports/coverage
````



### Unit Tests

Unit Tests prüfen einzelne Komponenten oder Funktionen der Anwendung isoliert. Laravel bietet Unterstützung für PHPUnit, um Unit Tests zu schreiben.

### Integrationstests

Integrationstests prüfen das Zusammenspiel mehrerer Komponenten. Beispiel: Überprüfung, ob die Registrierung eines Benutzers korrekt funktioniert und die Daten in der Datenbank gespeichert werden.

### End-to-End Tests

E2E Tests prüfen die Anwendung aus der Sicht eines Benutzers. Tools wie Laravel Dusk können verwendet werden, um Benutzerinteraktionen zu simulieren.

### Sicherheitstests

Sicherheitstests überprüfen die Anwendung auf mögliche Sicherheitslücken wie SQL-Injektionen, XSS (Cross-Site Scripting) und CSRF (Cross-Site Request Forgery).

### Lasttests

Lasttests simulieren hohe Benutzerzahlen, um die Leistung und Skalierbarkeit der Anwendung zu prüfen. Tools wie Apache JMeter können verwendet werden, um Lasttests durchzuführen.
"""
