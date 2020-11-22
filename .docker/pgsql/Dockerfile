FROM postgres:10

COPY ./local.conf /etc/postgresql/custom.conf
COPY ./dump.sql /docker-entrypoint-initdb.d

COPY healthcheck /usr/local/bin/

RUN chmod +x /usr/local/bin/*

HEALTHCHECK --interval=15s --timeout=30s --retries=3 \
   CMD healthcheck

EXPOSE 5432
CMD ["postgres", "-c", "config_file=/etc/postgresql/custom.conf"]
