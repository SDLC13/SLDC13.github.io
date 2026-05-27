# SDLC13.github.io
# Faculty Performance Evaluation Portal

A robust, enterprise-grade multi-tiered full-stack appraisal gateway developed for Rizal Technological University (RTU). This system features automated server-side verification pipelines, dynamic client states, and dedicated modular tracking environments for both Student Appraisals and Administrative Auditing.

---

## 🗺️ Architectural Topology (Separation of Concerns)

The application adheres strictly to a decoupled full-stack architectural map, dividing execution across three atomic runtime layers:

```mermaid
graph LR
    subgraph Frontend Layer [HTML5 / CSS3 / JavaScript ES6]
        A[php/index.php Student Portal]
        B[php/admin.php Admin Portal]
    end

    subgraph Backend Engine [PHP 8.2 / 8.3 Module]
        C[php/submit_evaluation.php Core]
        D[php/get_admin_reviews.php Core]
    end

    subgraph Database Store [MySQL Relational Engine]
        E[(evaluation_db Matrix)]
    end

    A -->|1. Transmits Payload Streams via Fetch API| C
    C -->|2. Validates & Binds Parameters Securely| E
    E -.->|3. Reads Raw Schema Storage Logs Rows| D
    D -.->|4. Feeds Serialized JSON Matrix Array| B